<?php
/**
 * ICS 2371 — Lab 5: Arrays and Array Operations
 * Task 2: Built-in Array Functions [6 marks]
 *
 * @author     [SUNDRA EVANS]
 * @student    [ENE212-0148/2023]
 * @lab        Lab 5 of 14
 * @unit       ICS 2371
 * @date       [23/04/2026]
 */

// Working dataset — use this array for ALL exercises below
$scores = [72, 45, 88, 91, 63, 77, 55, 88, 49, 95, 63, 70];

// ══════════════════════════════════════════════════════════════
// EXERCISE A — Counting & Summing
// ══════════════════════════════════════════════════════════════
// Use count() to print total number of scores
// Use array_sum() to print total marks
// Compute and print average (to 2 decimal places)

// Working dataset
$scores = [72, 45, 88, 91, 63, 77, 55, 88, 49, 95, 63, 70];

// Total number of scores
$total_count = count($scores);
echo "Total number of scores: " . $total_count . "<br>";

// Total marks
$total_sum = array_sum($scores);
echo "Total marks: " . $total_sum . "<br><br>";

// Average (to 2 decimal places)
$average = $total_sum / $total_count;
echo "Average score: " . number_format($average, 2) . "<br>";


// ══════════════════════════════════════════════════════════════
// EXERCISE B — Sorting
// ══════════════════════════════════════════════════════════════
// 1. Sort $scores ascending using sort() — print result
// 2. Sort $scores descending using rsort() — print result
// 3. Sort $scores ascending again and use array_reverse()
//    to get descending — print result
// Note: explain in a comment why sort() modifies the original array

// Working dataset
$scores = [72, 45, 88, 91, 63, 77, 55, 88, 49, 95, 63, 70];

// 1. Sort ascending using sort()
sort($scores); // NOTE: sort() modifies the original array directly
echo "Ascending (sort):<br>";
print_r($scores);

echo "<br><br>";

// 2. Sort descending using rsort()
rsort($scores); // also modifies the same array
echo "Descending (rsort):<br>";
print_r($scores);

echo "<br><br>";

// 3. Sort ascending again, then reverse
sort($scores); // back to ascending
$reversed = array_reverse($scores); // creates a new reversed array
echo "Descending (array_reverse after sort):<br>";
print_r($reversed);


// ══════════════════════════════════════════════════════════════
// EXERCISE C — Searching
// ══════════════════════════════════════════════════════════════
// 1. Use in_array() to check if 88 exists — print true/false
// 2. Use in_array() to check if 100 exists — print true/false
// 3. Use array_search() to find the index of 91 — print it
// 4. Use array_search() on a value that doesn't exist —
//    show how to handle the false return value safely

// Working dataset
$scores = [72, 45, 88, 91, 63, 77, 55, 88, 49, 95, 63, 70];

// 1. Use in_array() to check if 88 exists — print true/false
if (in_array(88, $scores)) {
    echo "88 exists in the array.<br>";
} else {
    echo "88 does not exist in the array.<br>";
}

// 2. Use in_array() to check if 100 exists — print true/false
if (in_array(100, $scores)) {
    echo "100 exists in the array.<br>";
} else {
    echo "100 does not exist in the array.<br>";
}

// 3. Use array_search() to find the index of 91 — print it
$index = array_search(91, $scores);
if ($index !== false) {
    echo "Index of 91: " . $index . "<br>";
} else {
    echo "91 not found in the array.<br>";
}

// 4. Use array_search() on a value that doesn't exist —
//    show how to handle the false return value safely
$index = array_search(100, $scores);
if ($index !== false) {
    echo "Index of 100: " . $index . "<br>";
} else {
    echo "100 not found in the array.<br>";
}


// ══════════════════════════════════════════════════════════════
// EXERCISE D — Transformation Functions
// ══════════════════════════════════════════════════════════════
// Use the original $scores array (re-declare if needed)
// 1. array_unique() — remove duplicates, print result
// 2. array_slice($scores, 2, 5) — print the slice and
//    explain what the parameters mean in a comment
// 3. implode(", ", $scores) — print as comma-separated string
// 4. array_reverse() — print reversed array

// Re-declare original dataset
$scores = [72, 45, 88, 91, 63, 77, 55, 88, 49, 95, 63, 70];

// 1. Remove duplicates using array_unique()
$unique_scores = array_unique($scores);
echo "Unique scores:<br>";
print_r($unique_scores);

echo "<br><br>";

// 2. Slice the array
$slice = array_slice($scores, 2, 5);
/*
Explanation:
array_slice($scores, 2, 5)
- 2 → starting index (3rd element, since index starts at 0)
- 5 → number of elements to extract
*/
echo "Sliced array (from index 2, 5 elements):<br>";
print_r($slice);

echo "<br>";

// 3. Convert array to comma-separated string
$comma_string = implode(", ", $scores);
echo "Comma-separated string:<br>";
echo $comma_string . "<br><br>";

echo "<br>";

// 4. Reverse the array
$reversed = array_reverse($scores);
echo "Reversed array:<br>";
print_r($reversed);
