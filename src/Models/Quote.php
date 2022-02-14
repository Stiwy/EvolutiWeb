<?php

namespace App\Models;

class Quote
{
    private $type;

    private $company_size;

    private $admin_panel;

    private $start_project_date;

    private $budget;

    private $details;

    private $company_name;

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

    public function getStartProjectDate(): ?\DateTime
    {
        return $this->start_project_date;
    }

    public function setStartProjectDate(?\DateTime $start_project_date): self
    {
        $this->start_project_date = $start_project_date;

        return $this;
    }

    public function getBudget()
    {
        return $this->budget;
    }

    public function setBudget($budget): self
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

    public function getCompanyName()
    {
        return $this->company_name;
    }

    public function setCompanyName(string $company_name): void
    {
        $this->company_name = $company_name;
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
