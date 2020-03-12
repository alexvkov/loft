<?php
function debug($param)
{
    echo "<pre>";
    var_dump($param);
    echo "<pre>";
}

function xmlOrder($fileName)
{
    $fileXml = file_get_contents($fileName);
    $xml = new SimpleXMLElement($fileXml);

    echo "Номер заказа: " . $xml->attributes()['PurchaseOrderNumber'] . "<br>";
    echo "Дата заказа: " . $xml->attributes()['OrderDate'] . "<br>";

    foreach ($xml->Address as $address) {
        echo "<br>";
        echo "Order:<br>";
        echo 'Type: ' . $address->attributes()['Type'] . '<br>';
        echo 'Name: ' . $address->Name->__toString() . '<br>';
        echo 'Street: ' . $address->Street->__toString() . '<br>';
        echo 'City: ' . $address->City->__toString() . '<br>';
        echo 'State: ' . $address->State->__toString() . '<br>';
        echo 'Zip: ' . $address->Zip->__toString() . '<br>';
        echo 'Country: ' . $address->Country->__toString() . '<br>';
    }

    foreach ($xml->Items->Item as $item) {
        echo "<br>";
        echo "Product:<br>";
        echo 'PartNumber: ' . $item->attributes()['PartNumber'] . '<br>';
        echo 'ProductName: ' . $item->ProductName->__toString() . '<br>';
        echo 'Quantity: ' . $item->Quantity->__toString() . '<br>';
        echo 'USPrice: ' . $item->USPrice->__toString() . '<br>';
        echo 'Comment: ' . $item->Comment->__toString() . '<br>';
    }
}

function arrayDiff($arr)
{
    $numCard = json_encode($arr);
    file_put_contents('output.json', $numCard);
    $newNum = file_get_contents('output.json');
    $jsonOne = json_decode($newNum, true);
    $changeArr = rand(0, 1);

    if ($changeArr == 0) {
        $newArrTwo = ["a" => 3, "b" => 88, "f" => 44,];
        $newArrThree = array_replace($arr, $newArrTwo);
        $newArrThreeJson = json_encode($newArrThree);
        file_put_contents('output2.json', $newArrThreeJson);
        $newNumTwo = file_get_contents('output2.json');
        $jsonTwo = json_decode($newNumTwo, true);
        $result = array_diff($jsonOne, $jsonTwo);
        echo "Первый массив <br>";
        debug($jsonOne);
        echo "Второй массив <br>";
        debug($jsonTwo);
        echo "Разница <br>";
        debug($result);
    } else {
        echo "Рулетка не на Вашей стороне";
    }
}


function csvSumNum()
{
    for ($i = 0; $i < 50; $i++) {
        $arr[$i] = rand(1, 100);
    }
    $arrayTwo[] = $arr;

// Открытие файла и запись в файл
    $fp = fopen('task3.csv', 'w');

    foreach ($arrayTwo as $fields) {
        fputcsv($fp, $fields);
    }
    fclose($fp);

    $csv = array_map('str_getcsv', file('task3.csv'));
    $sum = 0;
    for ($i = 0; $i < count($csv[0]); $i++) {
        if ($csv[0][$i] % 2 == 0) {
            echo $csv[0][$i] . ' - четное.' . "<br>";
            $sum += $csv[0][$i];
        }
    }
    echo "Сумма: " . $sum . "<br>";
}

function parseUrlJson()
{
    $url = "https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json";
    $openFile = file_get_contents($url);
    $newJsonD = json_decode($openFile, true);

    foreach ($newJsonD['query'] as $item) {
        foreach ($item as $value) {
            echo "Title : " . $value['title'] . "<br>";
            echo "Page_id : " . $value['pageid'];
        }
    }

}