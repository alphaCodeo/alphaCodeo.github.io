<?php
class Database extends SQLite3
{
    function __construct($file)
    {
        $this->open($file);
    }
}

$accounts = new Database("accounts.db");

if(!$accounts) {
    echo $accounts->lastErrorMsg();
    echo "<br>";
}

$sql = <<<EOF
    SELECT rowid, * FROM ACCOUNTS;
EOF;


$ret = $accounts->query($sql);

while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
    echo $row["rowid"];
    echo "<br>";
    echo $row["USERNAME"];
    echo "<br>";
    echo $row["PASSWORD_HASH"];
    echo "<br>";
}

if(!$ret){
    echo $accounts->lastErrorMsg();
    echo "<br>";
} else {
    echo "Command executed successfully: " . $sql;
    echo "<br>";
}

$accounts->close();
?>
