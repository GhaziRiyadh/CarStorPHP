<?php
$passwo = "12345678";
$today = date("Y-m-d H:i:s");
$lasr = password_hash($passwo, PASSWORD_ARGON2I);
print_r($lasr);
$data = file_get_contents("https://www.cloudflare.com/cdn-cgi/trace");
$uag = $_SERVER['HTTP_USER_AGENT'];
$myArray = preg_split('/\r\n|\r|\n/', $data);
$bata[] = 0;
for ($i = 0; $i < count($myArray); $i++) {
    $bata[$i] = substr($myArray[$i], strpos($myArray[$i], '=') + 1);
    if ($i == 5) {
        $myArray[$i] = $uag;
        $bata[$i] = $uag;
    }
}
preg_match('#\((.*?)\)#', $uag, $match);
$system = $match[1];
preg_match('#o\) (.*?) S#', $uag, $matchy);
$browser = $matchy[1];
print "<pre>";
print_r($bata);
$id = null;
$data = array(
    $id,
    $bata[2],
    $bata[8],
    $system,
    $browser
);

print_r($data);
echo "IP address:\t $bata[2]\n";
echo "Location:\t $bata[8]\n";
echo "System:\t\t $system\n";
echo "Browser:\t $browser\n";
print "</pre>";
require_once("./widgets/db.php");
$query = "INSERT INTO user_map (ip, locat, sys, browser) 
VALUES (INET_ATON($bata[2]), $bata[8], $system, $browser)";
if ($conn->query($query) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
$query = "SELECT `id` FROM `emp` ORDER BY ID DESC limit 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
print_r($row['id']);


$query = "SELECT `ID`, `name`, `photo`, `city`, `type`, `qualificiation`, `username` FROM `emp` ORDER BY type";

$employee = mysqli_query($conn, $query);

echo "<h1>User Comments</h1>";

while ($row = mysqli_fetch_array($employee)) {
    $id = $row['ID'];
    $name = $row['name'];
    $photo = $row['photo'];
    $city = $row['city'];
    $type = $row['type'];

    $qualification = $row['qualificiation'];
    $username = $row['username'];

    echo "  <div style='margin:30px 0px;'>
      id: $id<br />
      name: $name<br />
      photo: $photo<br />
      city: $city<br />
      type: $type<br />
      qualificiation: $qualification<br />
      username: $username
    </div>
  ";
}
