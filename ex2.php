<?php
include 'employee.php';
$employees = include 'employees.php';
$template = file_get_contents('template.html');
?>
<html>

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
    <div class="row">
        <div class="border col-2">
            <h5>Name</h5>
        </div>
        <div class="border col-2">
            <h5>Salary</h5>
        </div>
        <div class="border col-2">
            <h5>Taxed Salary</h5>
        </div>
        <div class="border col-2">
            <h5>Date</h5>
        </div>
        <div class="border col-2">
            <h5>Status</h5>
        </div>
        <div class="border col-2">
            <h5>Working Years</h5>
        </div>
    </div>
    <?php
    foreach ($employees as $employee) {
        $emp = new Employee($employee["name"], $employee["salary"], $employee["date"]);
        $templateAux=$template;
        $templateAux = str_replace("{{name}}",$emp->name,$templateAux);
        $templateAux = str_replace("{{salary}}",$emp->salary,$templateAux);
        $templateAux = str_replace("{{taxedSalary}}",$emp->getTaxedSalary(),$templateAux);
        $templateAux = str_replace("{{date}}",$emp->date,$templateAux);
        $templateAux = str_replace("{{status}}",$emp->getStatus(),$templateAux);
        $templateAux = str_replace("{{workingYears}}",$emp->getWorkingYears(),$templateAux);
        echo $templateAux;
    }
    ?>
</body>

</html>