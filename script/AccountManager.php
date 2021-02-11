<?php


class AccountManager
{

    private $databaseConnection;
    private $userId;
    private $dbData;

    public function __construct(pdo $dbConnection, $userId = 0, bool $logoutIfInvalid = false)
    {
        $this->databaseConnection = $dbConnection;
        $this->userId = $userId;

        $stmt = $dbConnection->prepare('SELECT `email`,`firstname`,`lastname`,`role`,`active`,`premium` FROM `Account` WHERE `account_id` = :id');
        $stmt->bindParam(':id', $userId);
        $stmt->execute();
        if($stmt->rowCount() == 0 && $logoutIfInvalid == true) {
            session_destroy();
        }
        $this->dbData = $stmt->fetch();
    }

    public function isAdmin(): bool {
        if($this->dbData['role'] == 'ADMIN' || $this->dbData['role'] == 'ROOT') {
            return true;
        }
        return false;
    }

    public function getFirstLastName(): string {
        return $this->dbData['firstname'] . ' ' . $this->dbData['lastname'];
    }

    public function userIsPremium(): bool
    {
        if ($this->dbData['premium'] === '-1' || $this->dbData['premium'] > time()) {
            return true;
        }
        return false;
    }

    public function getUserType(): string {
        $accountType = '<small class="text-white">Standart Account</small>';
        if($this->userIsPremium()) {
            $accountType = '<small class="text-yellow">Premium Account</small>';
        }
        if($this->isAdmin()) {
            $accountType = '<small class="text-red">Administrator</small>';
        }
        return $accountType;
    }

}