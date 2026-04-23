<?php
/**
 * ICS 2371 — Lab 5: Arrays and Array Operations
 * Task 1: Array Declaration, Initialisation & Traversal [6 marks]
 *
 * @author     [SUNDRA EVANS]
 * @student    [ENE212-0148/2023]
 * @lab        Lab 5 of 14
 * @unit       ICS 2371
 * @date       [Date 23/04/2026]
 */

// ══════════════════════════════════════════════════════════════
// EXERCISE A — Indexed Array: Sensor Readings
// ══════════════════════════════════════════════════════════════
// Declare an indexed array $temperatures with 6 float values:
// 36.5, 37.1, 38.4, 36.9, 39.2, 37.8
// 1. Print the array using print_r()
// 2. Access and print the 3rd and 5th elements by index
// 3. Traverse using a for loop — print each value with its index:
//    "Reading [0]: 36.5°C"
// 4. Traverse using foreach — same output format

// Declare the indexed array
$temperatures = [36.5, 37.1, 38.4, 36.9, 39.2, 37.8];

// 1. Print the array using print_r()
echo "Full Array:\n";
print_r($temperatures);

echo "<br>";

// 2. Access and print the 3rd and 5th elements (index 2 and 4)
echo "3rd element: " . $temperatures[2] . "°C<br>";
echo "5th element: " . $temperatures[4] . "°C<br>";

echo "<br>";

// 3. Traverse using a for loop
echo "Using for loop:\n";
for ($i = 0; $i < count($temperatures); $i++) {
    echo "Reading [$i]: " . $temperatures[$i] . "°C<br>";
}

echo "<br>";

// 4. Traverse using foreach
echo "Using foreach loop:\n";
foreach ($temperatures as $index => $value) {
    echo "Reading [$index]: " . $value . "°C<br>";
}
// ══════════════════════════════════════════════════════════════
// EXERCISE B — Associative Array: Student Record
// ══════════════════════════════════════════════════════════════
// Declare an associative array $student with keys:
// "name", "reg_number", "course", "year", "gpa"
// Use your own details as values.
// 1. Print the full array with print_r()
// 2. Access and print name and gpa individually
// 3. Traverse with foreach (key => value) and print:
//    "name: Jane Wanjiku"
//    "reg_number: SCT212-0001/2024"  etc.

// Declare the associative array
$student = [
    "name" => "Sundra Evans",
    "reg_number" => "ENE212-0148/2023",
    "course" => "ECE",
    "year" => 3,
    "gpa" => 3.8
];

// 1. Print the full array with print_r()
echo "Full Student Record:\n";
print_r($student);

echo "<br>";

// 2. Access and print name and gpa individually
echo "Name: " . $student["name"] . "\n";
echo "GPA: " . $student["gpa"] . "\n";

echo "<br>";

// 3. Traverse with foreach (key => value) and print
foreach ($student as $key => $value) {
    echo "$key: $value<br>";
}

// ══════════════════════════════════════════════════════════════
// EXERCISE C — Array Modification
// ══════════════════════════════════════════════════════════════
// Start with: $fruits = ["mango", "banana", "avocado"];
// 1. Add "pawpaw" using array_push()
// 2. Add "guava" using the [] syntax
// 3. Print the array after each addition
// 4. Remove the last element using array_pop() — print result
// 5. Remove "banana" using unset() — print result
// 6. Print count() before and after each modification

// Start with the initial array
$fruits = ["mango", "banana", "avocado"];

// Initial count
echo "Initial array:<br>";
print_r($fruits);
echo "Count: " . count($fruits) . "<br><br>";

// 1. Add "pawpaw" using array_push()
echo "Before array_push(): Count = " . count($fruits) . "<br>";
array_push($fruits, "pawpaw");
echo "After adding 'pawpaw':\n";
print_r($fruits);
echo "Count: " . count($fruits) . "<br><br>";

// 2. Add "guava" using [] syntax
echo "Before adding 'guava': Count = " . count($fruits) . "<br>";
$fruits[] = "guava";
echo "After adding 'guava':\n";
print_r($fruits);
echo "Count: " . count($fruits) . "<br><br>";

// 4. Remove last element using array_pop()
echo "Before array_pop(): Count = " . count($fruits) . "<br>";
array_pop($fruits);
echo "After removing last element:\n";
print_r($fruits);
echo "Count: " . count($fruits) . "<br><br>";

// 5. Remove "banana" using unset()
echo "Before removing 'banana': Count = " . count($fruits) . "<br>";
unset($fruits[1]); // banana is at index 1
echo "After removing 'banana':\n";
print_r($fruits);
echo "Count: " . count($fruits) . "<br><br>";


// ══════════════════════════════════════════════════════════════
// EXERCISE D — Nested Array
// ══════════════════════════════════════════════════════════════
// Declare a nested associative array $lab_results with
// at least 3 students, each having: name, cat_total, exam
// Traverse with nested foreach and print a formatted
// result for each student showing name and total marks.

// Declare the nested associative array
$lab_results = [
    [
        "name" => "Alice",
        "cat_total" => 28,
        "exam" => 60
    ],
    [
        "name" => "Brian",
        "cat_total" => 25,
        "exam" => 55
    ],
    [
        "name" => "Cynthia",
        "cat_total" => 30,
        "exam" => 65
    ]
];

// Traverse using nested foreach
foreach ($lab_results as $student) {
    $total = 0;

    foreach ($student as $key => $value) {
        if ($key == "cat_total" || $key == "exam") {
            $total += $value;
        }
    }

    echo "Name: " . $student["name"] . " | Total Marks: " . $total . "<br>";
}