<?php
/**
 * ICS 2371 — Lab 5: Arrays and Array Operations
 * Task 3: Bubble Sort & Linear Search [7 marks]
 *
 * IMPORTANT: You must write pseudocode AND a flowchart for BOTH
 * the bubble sort and linear search in your PDF report BEFORE
 * writing any code below.
 *
 * @author     [SUNDRA EVANS]
 * @student    [ENE212-0148/2023]
 * @lab        Lab 5 of 14
 * @unit       ICS 2371
 * @date       [23/04/2026]
 */

// Working dataset
$data = [64, 34, 25, 12, 22, 11, 90, 47, 55, 38];

// ══════════════════════════════════════════════════════════════
// EXERCISE A — Manual Bubble Sort (ascending)
// ══════════════════════════════════════════════════════════════
// Implement bubble sort WITHOUT using PHP's sort() function.
// Use nested for loops.
// Rules:
//   - Outer loop: runs (n-1) times
//   - Inner loop: compares adjacent pairs
//   - Swap if left > right using a $temp variable
//   - Print the array after EACH full outer pass to show progress
//
// Expected: [11, 12, 22, 25, 34, 38, 47, 55, 64, 90]
//
// After sorting, answer in a comment:
// Q: How many comparisons does bubble sort make for n=10 elements
//    in the worst case? Show your working.

// Sample array (unsorted)
$scores = [64, 34, 25, 12, 22, 11, 90, 55, 47, 38];

$n = count($scores);

// Bubble Sort
for ($i = 0; $i < $n - 1; $i++) {
    for ($j = 0; $j < $n - $i - 1; $j++) {
        // Compare adjacent elements
        if ($scores[$j] > $scores[$j + 1]) {
            // Swap using temp variable
            $temp = $scores[$j];
            $scores[$j] = $scores[$j + 1];
            $scores[$j + 1] = $temp;
        }
    }

    // Print array after each outer pass
    echo "After pass " . ($i + 1) . ": ";
    print_r($scores);
    echo "<br>";
}

// Final sorted array
echo "Final sorted array:<br>";
print_r($scores);

// ══════════════════════════════════════════════════════════════
// EXERCISE B — Optimised Bubble Sort
// ══════════════════════════════════════════════════════════════
// Modify your bubble sort to use a $swapped flag.
// If no swaps occur in a full pass, the array is already sorted
// — break early. This is the optimised version.
// Test it on an already-sorted array and show it exits early.

// Test with an already sorted array
$scores = [11, 12, 22, 25, 34, 38, 47, 55, 64, 90];

$n = count($scores);

for ($i = 0; $i < $n - 1; $i++) {
    $swapped = false; // reset flag at start of each pass

    for ($j = 0; $j < $n - $i - 1; $j++) {
        if ($scores[$j] > $scores[$j + 1]) {
            // swap
            $temp = $scores[$j];
            $scores[$j] = $scores[$j + 1];
            $scores[$j + 1] = $temp;

            $swapped = true; // a swap occurred
        }
    }

    echo "After pass " . ($i + 1) . ": ";
    print_r($scores);
    echo "<br>";

    // If no swaps happened, array is already sorted
    if (!$swapped) {
        echo "No swaps occurred — array is already sorted. Exiting early.<br>";
        break;
    }
}

echo "Final array:<br>";
print_r($scores);


// ══════════════════════════════════════════════════════════════
// EXERCISE C — Linear Search
// ══════════════════════════════════════════════════════════════
// Implement a linear search function:
//   linearSearch(array $arr, $target): int|false
// Returns the INDEX of $target if found, false if not found.
// Do NOT use in_array() or array_search() — implement manually.
//
// Test with:
//   linearSearch($data, 22)  → should return index 4 (original array)
//   linearSearch($data, 99)  → should return false
//
// Print clearly: "Found 22 at index 4" or "99 not found"

// Working dataset (original unsorted array)
$data = [64, 34, 25, 12, 22, 11, 90, 55, 47, 38];

// Linear search function
function linearSearch(array $arr, $target) {
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] == $target) {
            return $i; // return index if found
        }
    }
    return false; // not found
}

// Test 1
$result1 = linearSearch($data, 22);
if ($result1 !== false) {
    echo "Found 22 at index " . $result1 . "<br>";
} else {
    echo "22 not found<br>";
}

// Test 2
$result2 = linearSearch($data, 99);
if ($result2 !== false) {
    echo "Found 99 at index " . $result2 . "<br>";
} else {
    echo "99 not found<br>";
}


// ══════════════════════════════════════════════════════════════
// EXERCISE D — Sort then Search
// ══════════════════════════════════════════════════════════════
// 1. Sort $data using your bubble sort from Exercise A
// 2. Run linearSearch() on the sorted array for value 47
// 3. In a comment, explain: after sorting, has the index of 47
//    changed compared to the original array? Why does this matter?

$data = [64, 34, 25, 12, 22, 11, 90, 55, 47, 38];

// Step 1: Show index of 47 in the ORIGINAL array first
$originalIndex = linearSearch($data, 47);
echo "Before sorting — 47 found at index: " . $originalIndex . "<br>";

// Step 2: Sort $data using bubble sort from Exercise A
$n = count($data);

for ($i = 0; $i < $n - 1; $i++) {
    for ($j = 0; $j < $n - $i - 1; $j++) {
        if ($data[$j] > $data[$j + 1]) {
            $temp = $data[$j];
            $data[$j] = $data[$j + 1];
            $data[$j + 1] = $temp;
        }
    }
}

echo "Sorted array: ";
print_r($data);
echo "<br>";

// Step 3: Run linearSearch() on the sorted array for value 47
$sortedIndex = linearSearch($data, 47);
echo "After sorting — 47 found at index: " . $sortedIndex . "<br>";
