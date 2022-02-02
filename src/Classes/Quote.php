<?php

namespace App\Classes;

use App\Repository\QuoteRepository;
use Doctrine\ORM\Mapping as ORM;

class Quote
{

    private $type;

    private $company_size;

    private $admin_panel;

    private $start_project_date;

    private $duration;

    private $budget;

    private $details;

    private $name;

    private $phone;

    private $email;


    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getCompanySize(): ?string
    {
        return $this->company_size;
    }

    public function setCompanySize(string $company_size): self
    {
        $this->company_size = $company_size;

        return $this;
    }

    public function getAdminPanel(): ?bool
    {
        return $this->admin_panel;
    }

    public function setAdminPanel(bool $admin_panel): self
    {
        $this->admin_panel = $admin_panel;

        return $this;
    }

    public function getStartProjectDate(): ?\DateTimeInterface
    {
        return $this->start_project_date;
    }

    public function setStartProjectDate(\DateTimeInterface $start_project_date): self
    {
        $this->start_project_date = $start_project_date;

        return $this;
    }

    public function getDuration(): ?string
    {
        return $this->duration;
    }

    public function setDuration(string $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getBudget(): ?int
    {
        return $this->budget;
    }

    public function setBudget(?int $budget): self
    {
        $this->budget = $budget;

        return $this;
    }

    public function getDetails()
    {
        return $this->details;
    }

    public function setDetails(string $details): void
    {
        $this->details = $details;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone(int $phone): void
    {
        $this->phone = $phone;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
}
