<?php
#Функція для 1 завдання
function calculateDigitSum($number) {
    $sum = 0;
    while ($number > 0) {
        $sum += $number % 10;
        $number = (int)($number / 10);
    }
    return $sum ;
}
?>
<?php
#Функція для 6 завдання
function getAbbreviatedName($fullName) {
    $parts = explode(' ', $fullName);

    if (count($parts) !== 3) {
        return "Неправильний формат імені";
    }

    $lastName = $parts[0];
    $firstName = $parts[1];
    $middleName = $parts[2];

    $abbreviatedName = $lastName . ' ' . mb_substr($firstName, 0, 1) . '. ' . mb_substr($middleName, 0, 1) . '.';

    return $abbreviatedName;
}
?>
<?php
#Функція для 7 завдання
function getTrafficLightColor($minute) {

    if ($minute < 1 || $minute > 60) {
        return "Неправильний діапазон. Введіть число від 1 до 60.";
    }


    $cycleMinute = $minute % 5;

    if ($cycleMinute == 1 || $cycleMinute == 2 || $cycleMinute == 3) {
        return "зелений";
    } else {
        return "червоний";
    }
}


?>
<?php
#Функція для 8 завдання
function isLeapYear($year) {

    if ($year < 1 || $year > 9999) {
        return "Неправильний діапазон. Введіть число від 1 до 9999.";
    }

    if ($year % 4 == 0 && ($year % 100 != 0 || $year % 400 == 0)) {
        return "Рік $year є високосним.";
    } else {
        return "Рік $year не є високосним.";
    }
}
?>
<?php
#Функція для 9 завдання
function sumOfSquares($n) {
    $squaresSum = 0;
    for ($i = 1; $i <= $n; $i++) {
      
        $square = $i * $i;
        $squaresSum += $square;
      
        echo "Квадрат числа $i: $square\n";
    }

    echo "Сума квадратів: $squaresSum\n";

    return $squaresSum;
}


?>
<?php
#Функція для 10 завдання
function cut($string, $length = 10) {

    $chars = preg_split('//u', $string, -1, PREG_SPLIT_NO_EMPTY);

    $charCount = count($chars);

    $result = '';

    for ($i = 0; $i < min($charCount, $length); $i++) {
        $result .= $chars[$i];
    }
    
    echo $result;
}

?>

<?php
echo "Task 1 \n";
//1 Вам потрібно розробити програму, яка рахувала б суму цифр числа введеного користувачем. Наприклад: є число 123, програма повинна обчислити суму цифр 1, 2, 3, = 6. За бажанням можете зробити перевірку на коректність введення даних користувачем.
$number = 123;
$digitSum = calculateDigitSum($number);
echo "Сума цифр числа $number: $digitSum\n";

function countOccurrences($number, $digit) {
    $count = 0;
    $number = (string)$number; 
    $digit = (string)$digit; 
    for ($i = 0; $i < strlen($number); $i++) {
        if ($number[$i] === $digit) {
            $count++;
        }
    }
    return $count;
}
echo "----------------------------------------------------------------------------- \n";
echo "Task 2 \n";
#2 Вам потрібно розробити програму, яка рахує кількість входжень, будь-якої, вибраної вами цифри у заданому значенні. Наприклад: цифра 5 в числі 442158755745 зустрічається 4 рази.
$number = 442 ;
$chosenDigit = 5;
$occurrences = countOccurrences($number, $chosenDigit);
echo "Наприклад: цифра $chosenDigit в числі $number зустрічається $occurrences разів.\n";

echo "----------------------------------------------------------------------------- \n";
echo "Task 3 \n";
#3 Розробіть програму, яка з числа 20 .. 45 знайде ті, які діляться на 5 і знайде суму цих чисел. Можна використовувати функцію fmod для визначення "ділиться число" або "не ділиться".
for($number=20; $number<45; $number++)
{
	$digitSum = calculateDigitSum($number);
	echo "Сума цифр числа $number: $digitSum\n";
	echo ($digitSum % 5) ? "$digitSum - не ділиться \n" : "$digitSum - ділиться \n";
}
echo "----------------------------------------------------------------------------- \n";
echo "Task 4 \n";
#4 Створити массив, заповнити його випадковими знаннями (можна використовувати функцію rand), знайти максимальне і мінімальне значення массива і поміняти їх місцями.
// Ініціалізуємо масив з випадковими числами
$randomNumbers = array();

// Заповнюємо масив 10 випадковими числами від 1 до 100
for ($i = 0; $i < 10; $i++) {
    $randomNumbers[] = rand(1, 100);
}

echo "Оригінальний масив: ";
print_r($randomNumbers);

$maxValue = max($randomNumbers);
$minValue = min($randomNumbers);

$maxIndex = array_search($maxValue, $randomNumbers);
$minIndex = array_search($minValue, $randomNumbers);

echo "Максимальне значення: $maxValue [$maxIndex]\n";
echo "Мінімальне значення: $minValue [$minIndex]\n";

$randomNumbers[$maxIndex] = $minValue;
$randomNumbers[$minIndex] = $maxValue;

echo "Масив після заміни: ";
print_r($randomNumbers);

echo "----------------------------------------------------------------------------- \n";
echo "Task 5 \n";
#5Створити массив заповнивши його випадковими числами від 0 до 100 (rand). Порахувати добуток елементів, які більше 0 та у яких парні індекси. Вивести результат на екран і вивести елементи, які більше нуля і у яких не парний індекс.


$randomNumbers = array();

for ($i = 0; $i < 10; $i++) {
    $randomNumbers[] = rand(0, 100);
}

echo "Оригінальний масив: ";
print_r($randomNumbers);

$product = 1;
$hasNonZeroEvenIndex = false;

for ($i = 0; $i < count($randomNumbers); $i += 2) {
    if ($randomNumbers[$i] > 0) {
        $product *= $randomNumbers[$i];
        $hasNonZeroEvenIndex = true;
    }
}

if (!$hasNonZeroEvenIndex) {
    $product = 0;
}

echo "Добуток елементів на парних індексах, які більше 0: $product\n";

echo "Елементи, які більше нуля і знаходяться на непарних індексах: ";
for ($i = 1; $i < count($randomNumbers); $i += 2) {
    if ($randomNumbers[$i] > 0) {
        echo $randomNumbers[$i] . " ";
    }
}
echo "\n";
echo "----------------------------------------------------------------------------- \n";
echo "Task 6 \n";
#6 Створити стислий варіант ПІП. Наприклад, вводимо: Іванов Іван Петрович, а в результаті  отримуємо: Іванов І. П.
$fullName = "Іванов Іван Петрович";
echo getAbbreviatedName($fullName);
echo "\n";
echo "----------------------------------------------------------------------------- \n";
echo "Task 7 \n";
#7 Робота світлофора запрограмована таким чином: з початку кожної години, протягом трьох хвилин горить зелений сигнал, наступні дві хвилини горить червоний, далі протягом трьох хвилин - зелений і т. д. Вам потрібно розробити програму, яка по введеному числу від 1 до 60 визначає якого кольору зараз горить сигнал.
$minute = 7; 
echo "На $minute-й хвилині сигнал світлофора: " . getTrafficLightColor($minute) . "\n";
#8 Перевірити чи високосний рік. Вам потрібно розробити програму, яка перевіряла б введене користувачем число (рік). Число може бути в діапазоні від 1 до 9999.
echo "----------------------------------------------------------------------------- \n";
echo "Task 8 \n";
$year = 2028; 
echo isLeapYear($year);
#9 Дано натуральне число n. Обчислити: 11 + 22 + .. + nn. Вивести на екран квадрати цих чисел, а також суму квадратів цих чисел.
echo "----------------------------------------------------------------------------- \n";
echo "Task 9 \n";
$n = 5; 
$sum = sumOfSquares($n);

#9 Дано натуральне число n. Обчислити: 11 + 22 + .. + nn. Вивести на екран квадрати цих чисел, а також суму квадратів цих чисел.
echo "----------------------------------------------------------------------------- \n";
echo "Task 10 \n";

$string = "1 2 3 4 5 6";
cut($string, 5); 
?>

