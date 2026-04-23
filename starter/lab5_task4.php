<?php
/**
 * ICS 2371 — Lab 5: Arrays and Array Operations
 * Task 4: Engineering Analysis Using Arrays & Loops [6 marks]
 *
 * IMPORTANT: Pseudocode AND flowchart required in PDF report
 * before writing code.
 *
 * @author     [SUNDRA EVANS]
 * @student    [ENE212-0148/2023]
 * @lab        Lab 5 of 14
 * @unit       ICS 2371
 * @date       [23/04/2026]
 */

// ── Scenario: Bridge Load Sensor Analysis ────────────────────
// A bridge has 8 load sensors recording weight in tonnes.
// Analyse the readings to support a structural safety report.

$sensor_readings = [12.4, 8.7, 15.2, 19.8, 7.3, 14.6, 11.9, 16.3];
$sensor_labels   = ["S1", "S2", "S3", "S4", "S5", "S6", "S7", "S8"];
$max_safe_load   = 18.0; // tonnes — safety threshold

// ── STEP 1: Basic statistics ─────────────────────────────────
// Compute WITHOUT using array_sum(), max(), min() PHP functions
// Use loops only:
//   $mean   — average of all readings (2 decimal places)
//   $max    — highest reading + which sensor
//   $min    — lowest reading + which sensor
//   $total  — sum of all readings

$sensor_readings = [12.4, 8.7, 15.2, 19.8, 7.3, 14.6, 11.9, 16.3];
$sensor_labels   = ["S1", "S2", "S3", "S4", "S5", "S6", "S7", "S8"];
$max_safe_load   = 18.0;

// Initialize variables using the first element of the array
$total = 0;
$max = $sensor_readings[0];
$max_sensor = $sensor_labels[0];
$min = $sensor_readings[0];
$min_sensor = $sensor_labels[0];

// Loop through the data
foreach ($sensor_readings as $index => $reading) {
    // Calculate Total
    $total += $reading;

    // Determine Max
    if ($reading > $max) {
        $max = $reading;
        $max_sensor = $sensor_labels[$index];
    }

    // Determine Min
    if ($reading < $min) {
        $min = $reading;
        $min_sensor = $sensor_labels[$index];
    }
}

// Calculate Mean (Average)
$count = count($sensor_readings);
$mean = round($total / $count, 2);

// Output Results
echo "--- Bridge Load Analysis ---<br>";
echo "Total Load:    " . $total . " tonnes<br>";
echo "Mean Load:     " . $mean . " tonnes<br>";
echo "Max Reading:   " . $max . " tonnes (Sensor: " . $max_sensor . ")<br>";
echo "Min Reading:   " . $min . " tonnes (Sensor: " . $min_sensor . ")<br>";

// ── STEP 2: Above-average count ──────────────────────────────
// Count how many sensors recorded ABOVE the mean.
// Store their labels in an $above_avg array.
// Print: "X of 8 sensors recorded above-average load"
// Print the list of those sensor labels.

$above_avg = [];

// Loop to find sensors exceeding the average
foreach ($sensor_readings as $index => $reading) {
    if ($reading > $mean) {
        $above_avg[] = $sensor_labels[$index];
    }
}

// Result counts
$above_avg_count = count($above_avg);
$total_sensors = count($sensor_readings);

// Output Results
echo "--- Step 2: Above-Average Analysis ---<br>";
echo "{$above_avg_count} of {$total_sensors} sensors recorded above-average load.<br>";
echo "Sensors: " . implode(", ", $above_avg) . "<br>";


// ── STEP 3: Safety threshold check ───────────────────────────
// Check each sensor against $max_safe_load (18.0 tonnes)
// If reading > $max_safe_load: flag as "UNSAFE"
// Otherwise: "SAFE"
// Print a formatted safety report table:
//   Sensor | Reading | Status
//   S1     | 12.4t   | SAFE
//   S4     | 19.8t   | UNSAFE  ← flag clearly

echo str_pad("Sensor", 8) . " | " . str_pad("Reading", 8) . " | Status<br>";
echo str_repeat("-", 30) . "<br>";

foreach ($sensor_readings as $index => $reading) {
    $label = $sensor_labels[$index];
    
    // Determine safety status
    if ($reading > $max_safe_load) {
        $status = "UNSAFE  ← flag clearly";
    } else {
        $status = "SAFE";
    }

    // Print formatted row
    echo str_pad($label, 8) . " | " . str_pad($reading . "t", 8) . " | " . $status . "<br>";
}

// ── STEP 4: Sorted safety report ─────────────────────────────
// Sort the sensor readings in DESCENDING order using your
// bubble sort from Task 3 (copy the function here).
// Print the sorted readings alongside their original sensor labels.
// Note: you must track which label belongs to which reading
// as you sort — use a parallel array technique.

$sensor_readings = [12.4, 8.7, 15.2, 19.8, 7.3, 14.6, 11.9, 16.3];
$sensor_labels   = ["S1", "S2", "S3", "S4", "S5", "S6", "S7", "S8"];
$n = count($sensor_readings);

// --- Bubble Sort Implementation (Descending Order) ---
// We iterate through the array and swap adjacent elements if they are 
// out of order. Parallel swapping ensures S4 stays with 19.8.
for ($i = 0; $i < $n - 1; $i++) {
    for ($j = 0; $j < $n - $i - 1; $j++) {
        // Compare current reading with the next one
        if ($sensor_readings[$j] < $sensor_readings[$j + 1]) {
            
            // Swap values in the readings array
            $temp_val = $sensor_readings[$j];
            $sensor_readings[$j] = $sensor_readings[$j + 1];
            $sensor_readings[$j + 1] = $temp_val;

            // Swap values in the labels array (Parallel Tracking)
            $temp_label = $sensor_labels[$j];
            $sensor_labels[$j] = $sensor_labels[$j + 1];
            $sensor_labels[$j + 1] = $temp_label;
        }
    }
}

// --- Output Sorted Results ---
echo "--- Step 4: Sorted Safety Report (Highest Load First) ---<br>";
echo str_pad("Rank", 6) . "| " . str_pad("Sensor", 8) . "| Reading<br>";
echo str_repeat("-", 30) . "<br>";

foreach ($sensor_readings as $index => $reading) {
    $rank = $index + 1;
    echo str_pad($rank, 6) . "| " . str_pad($sensor_labels[$index], 8) . "| {$reading}t\n";
}


// ── Required Test Data Sets — screenshot each ────────────────
// Set A (default above): expect S4 UNSAFE, mean ~13.28t
// Set B: [5.1, 5.2, 5.3, 5.4, 5.5, 5.6, 5.7, 5.8]
//        → all SAFE, mean 5.45t, above-avg = 4 sensors
// Set C: [20.1, 21.3, 19.9, 22.0, 18.5, 20.8, 19.2, 21.7]
//        → all UNSAFE (all exceed 18.0t)
