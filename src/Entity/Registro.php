<?php

namespace App\Entity;

use App\Repository\RegistroRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=RegistroRepository::class)
 * @ORM\HasLifecycleCallbacks
 * @Vich\Uploadable
 *
 */
class Registro
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $apaterno;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $amaterno;

    /**
     * @ORM\Column(type="string", length=100, unique=true)
     * @Gedmo\Slug(fields={"nombre", "apaterno", "amaterno"}, updatable=false)
     */
    private $slug;

//    /**
//     * @ORM\Column(type="boolean")
//     */
//    private $sexo;

    /**
     * @ORM\Column(type="date")
     */
    private $nacimiento;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $correo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $universidad;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $carrera;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $semestre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $profesor;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $univProf;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $correoProf;

    /**
     * @ORM\Column(type="boolean")
     */
    private $asistencia;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $beca;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $vegetariano;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $modified;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="registro_historial", fileNameProperty="historialName")
     *
     * @Assert\File(
     *     maxSize = "2M",
     * uploadFormSizeErrorMessage = "El archivo debe ser menor a 2 MB",
     *     mimeTypes = {"application/pdf", "application/x-pdf"},
     *     mimeTypesMessage = "Favor de subir un archivo PDF válido (historial académico o cárdex)"
     * )
     *
     * @var File|null
     */
    private $historialFile;

    /**
     * @ORM\Column(type="string")
     *
     * @var string|null
     */
    private $historialName;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="registro_recomendacion", fileNameProperty="recomendacionName")
     *
     * @Assert\File(
     *     maxSize = "2M",
     * uploadFormSizeErrorMessage = "El archivo debe ser menor a 2 MB",
     *     mimeTypes = {"application/pdf", "application/x-pdf"},
     *     mimeTypesMessage = "Favor de subir un archivo PDF válido (recomendación)"
     * )
     *
     * @var File|null
     */
    private $recomendacionFile;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     * @var string|null
     */
    private $recomendacionName;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $aceptado;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $confirmado;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comentarios;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $recomendaciontxt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApaterno(): ?string
    {
        return $this->apaterno;
    }

    public function setApaterno(string $apaterno): self
    {
        $this->apaterno = $apaterno;

        return $this;
    }

    public function getAmaterno(): ?string
    {
        return $this->amaterno;
    }

    public function setAmaterno(?string $amaterno): self
    {
        $this->amaterno = $amaterno;

        return $this;
    }

  /*  public function getSexo(): ?bool
    {
        return $this->sexo;
    }

    public function setSexo(bool $sexo): self
    {
        $this->sexo = $sexo;

        return $this;
    }*/

    public function getNacimiento(): ?\DateTimeInterface
    {
        return $this->nacimiento;
    }

    public function setNacimiento(\DateTimeInterface $nacimiento): self
    {
        $this->nacimiento = $nacimiento;

        return $this;
    }

    public function getCorreo(): ?string
    {
        return $this->correo;
    }

    public function setCorreo(string $correo): self
    {
        $this->correo = $correo;

        return $this;
    }

    public function getUniversidad(): ?string
    {
        return $this->universidad;
    }

    public function setUniversidad(string $universidad): self
    {
        $this->universidad = $universidad;

        return $this;
    }

    public function getCarrera(): ?string
    {
        return $this->carrera;
    }

    public function setCarrera(string $carrera): self
    {
        $this->carrera = $carrera;

        return $this;
    }

    public function getSemestre(): ?string
    {
        return $this->semestre;
    }

    public function setSemestre(string $semestre): self
    {
        $this->semestre = $semestre;

        return $this;
    }

    public function getProfesor(): ?string
    {
        return $this->profesor;
    }

    public function setProfesor(string $profesor): self
    {
        $this->profesor = $profesor;

        return $this;
    }

    public function getUnivProf(): ?string
    {
        return $this->univProf;
    }

    public function setUnivProf(string $univProf): self
    {
        $this->univProf = $univProf;

        return $this;
    }

    public function getCorreoProf(): ?string
    {
        return $this->correoProf;
    }

    public function setCorreoProf(string $correoProf): self
    {
        $this->correoProf = $correoProf;

        return $this;
    }

    public function getAsistencia(): ?bool
    {
        return $this->asistencia;
    }

    public function setAsistencia(bool $asistencia): self
    {
        $this->asistencia = $asistencia;

        return $this;
    }

    public function getBeca(): ?string
    {
        return $this->beca;
    }

    public function setBeca(string $beca): self
    {
        $this->beca = $beca;

        return $this;
    }

    public function getVegetariano(): ?string
    {
        return $this->vegetariano;
    }

    public function setVegetariano(string $vegetariano): self
    {
        $this->vegetariano = $vegetariano;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set modified
     *
     * @param \DateTime $modified
     */
    public function setModified($modified)
    {
        $this->modified = $modified;

        return $this;
    }

    /**
     * Get modified
     *
     * @return \DateTime
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        $this->setCreated(new \DateTime());
        $this->setModified(new \DateTime());
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        $this->setModified(new \DateTime());
    }

    /**
     * Set historialFile
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $historial
     */
    public function sethistorialFile(?File $historial = null): void
    {
        $this->historialFile = $historial;

        if (null !== $historial) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getHistorialFile(): ?File
    {
        return $this->historialFile;
    }

    public function setHistorialName(?string $historialName): void
    {
        $this->historialName = $historialName;
    }

    public function getHistorialName(): ?string
    {
        return $this->historialName;
    }

    /**
     * Set recomendacionFile
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $recomendacion
     */
    public function recomendacionFile(?File $recomendacion = null): void
    {
        $this->recomendacionFile = $recomendacion;

        if (null !== $recomendacion) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getRecomendacionFile(): ?File
    {
        return $this->recomendacionFile;
    }

    public function setRecomendacionName(?string $recomendacionName): void
    {
        $this->recomendacionName = $recomenacionName;
    }

    public function getRecomendacionName(): ?string
    {
        return $this->recomendacionName;
    }

    public function getAceptado(): ?bool
    {
        return $this->aceptado;
    }

    public function setAceptado(?bool $aceptado): self
    {
        $this->aceptado = $aceptado;

        return $this;
    }

    public function getConfirmado(): ?bool
    {
        return $this->confirmado;
    }

    public function setConfirmado(?bool $confirmado): self
    {
        $this->confirmado = $confirmado;

        return $this;
    }

    public function getComentarios(): ?string
    {
        return $this->comentarios;
    }

    public function setComentarios(?string $comentarios): self
    {
        $this->comentarios = $comentarios;

        return $this;
    }

    public function getRecomendaciontxt(): ?string
    {
        return $this->recomendaciontxt;
    }

    public function setRecomendaciontxt(?string $recomendaciontxt): self
    {
        $this->recomendaciontxt = $recomendaciontxt;

        return $this;
    }
}
