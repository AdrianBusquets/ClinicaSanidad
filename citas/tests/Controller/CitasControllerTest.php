<?php

namespace App\Test\Controller;

use App\Entity\Citas;
use App\Repository\CitasRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CitasControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private CitasRepository $repository;
    private string $path = '/citas/';
    private EntityManagerInterface $manager;

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(Citas::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Cita index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'cita[medico]' => 'Testing',
            'cita[paciente]' => 'Testing',
            'cita[identificacion]' => 'Testing',
            'cita[fecha_cita]' => 'Testing',
        ]);

        self::assertResponseRedirects('/citas/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Citas();
        $fixture->setMedico('My Title');
        $fixture->setPaciente('My Title');
        $fixture->setIdentificacion('My Title');
        $fixture->setFecha_cita('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Cita');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Citas();
        $fixture->setMedico('My Title');
        $fixture->setPaciente('My Title');
        $fixture->setIdentificacion('My Title');
        $fixture->setFecha_cita('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'cita[medico]' => 'Something New',
            'cita[paciente]' => 'Something New',
            'cita[identificacion]' => 'Something New',
            'cita[fecha_cita]' => 'Something New',
        ]);

        self::assertResponseRedirects('/citas/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getMedico());
        self::assertSame('Something New', $fixture[0]->getPaciente());
        self::assertSame('Something New', $fixture[0]->getIdentificacion());
        self::assertSame('Something New', $fixture[0]->getFecha_cita());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Citas();
        $fixture->setMedico('My Title');
        $fixture->setPaciente('My Title');
        $fixture->setIdentificacion('My Title');
        $fixture->setFecha_cita('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/citas/');
    }
}
