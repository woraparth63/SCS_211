<?php
$jsonData = file_get_contents('https://raw.githubusercontent.com/arc6828/SCS211/main/week13/staff.json');

$data = json_decode($jsonData, true);

if ($data === null || !isset($data['people'])) {
    die('ไม่สามารถดึงข้อมูลได้หรือข้อมูลไม่ถูกต้อง');
}

$people = $data['people'];

echo '<html><head><style>';
echo '.person { width: 30%; float: left; box-sizing: border-box; text-align: center; padding: 20px; }';
echo '</style></head><body>';

foreach ($people as $person) {
    echo '<div class="person">';
    echo '<br><img src="' . $person['image'] . '" alt="' . $person['name'] . '" style="width:100px; height:100px;"><br>';
    echo 'รหัส: ' . $person['id'] . '<br>';
    echo 'ชื่อ: ' . $person['name'] . '<br>';
    echo 'การศึกษา: ' . $person['education'] . '<br>';
    echo 'ตำแหน่ง: ' . $person['role'] . '<br>';
    echo 'อีเมล: ' . $person['email'] . '<br>';
    echo 'โทรศัพท์: ' . $person['phone'] . '<br>';

    echo '</div>';
}

echo '</body></html>';
