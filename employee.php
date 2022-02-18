<?php
class Employee
{
	public string $name;
	public int $salary;
	public string $date;
    public float $vat=0.19;
    public float $taxedSalary;
	public function __construct($name, $salary,$date) {
		$this->name = $name;
		$this->salary = $salary;
        $this->date=$date;
        $this->taxedSalary=$salary;
	}
    public function getTaxedSalary() {
        if($this->salary>25)
        $this->taxedSalary=$this->salary-$this->salary*$this->vat;
            return $this->taxedSalary;
        return $this->taxedSalary;
    }
    public function getStatus() {
        if($this->taxedSalary>=80)
            return "Haladit💪🏻";
        return "Sarakie🤢";
    }
    public function getWorkingYears() {
        return 2022-explode('-',$this->date)[0];
    }
}
?>