<?php

class Student
{
    private $firstName;
    private $lastName;
    private $number;
    private $course;

    public function __construct($firstName, $lastName, $number, $course)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setNumber($number);
        $this->setCourse($course);
    }

    public function insertIntoDB(PDO $db)
    {
        try {
            $db->beginTransaction();
            $stm = $db->prepare("INSERT INTO students( first_name, last_name, number)
                                      VALUES(:firstName, :lastName, :number)");
            $firstName = $this->getFirstName();
            $lastName = $this->getLastName();
            $studentNumber = $this->getNumber();
            $courseName = $this->getCourse();

            $stm->bindParam('firstName', $firstName);
            $stm->bindParam('lastName', $lastName);
            $stm->bindParam('number', $studentNumber);
            $stm->execute();

            $studentId = $db->lastInsertId();//needed if course exists

            $stm = $db->prepare("SELECT * FROM courses WHERE course_name = :courseName");
            $stm->bindParam('courseName', $courseName);
            $stm->execute();

            $row = $stm->fetch(PDO::FETCH_ASSOC);//in order to check if course exists

            if(!$row) {
                echo "Course with such name does not exists.";
                $db->rollBack();
            } else {
                $db->commit();

                $course_id = $row['course_id'];

                $stm = $db->prepare("INSERT INTO student_subscription(student_id, course_id)
                                              VALUES(:studentId, :courseId);");
                $stm->bindParam('studentId', $studentId);
                $stm->bindParam('courseId', $course_id);
                $stm->execute();
            }

        } catch (PDOException $exc) {

            if ($exc->getCode() == 23000) {
                echo "Student with such number already exists";
            } else {
                echo $exc->getMessage();
            }
        }
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number)
    {
        $this->number = $number;
    }

    public function getCourse()
    {
        return $this->course;
    }

    public function setCourse($course)
    {
        $this->course = $course;
    }
}