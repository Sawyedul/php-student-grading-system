<?php

// Collect a valid score between 0 and 100.
function getScore(string $message): float
{
    do {
        $score = (float) readline($message);

        if ($score < 0 || $score > 100) {
            echo "Please enter a score between 0 and 100.\n";
        }
    } while ($score < 0 || $score > 100);

    return $score;
}

// Process academic results for five students.
for ($studentNumber = 1; $studentNumber <= 5; $studentNumber++) {

    echo "\n========== Student $studentNumber ==========\n";

    // Collect three examination scores.
    $examScores = [];

    for ($i = 1; $i <= 3; $i++) {
        $examScores[] = getScore("Enter exam $i score: ");
    }

    // Task 1: Calculate average and percentage.
    $totalMarks = array_sum($examScores);
    $average = $totalMarks / 3;
    $percentage = ($totalMarks / 300) * 100;

    echo "\n--- Basic Arithmetic Operations ---\n";
    echo "Total Marks: $totalMarks / 300\n";
    echo "Average Score: " . number_format($average, 2) . "\n";
    echo "Percentage: " . number_format($percentage, 2) . "%\n";

    // Task 2: Determine pass or fail.
    echo "\n--- Academic Result ---\n";

    if ($average >= 50) {
        echo "Result: Pass\n";
    } else {
        echo "Result: Fail\n";
    }

    // Task 3: Check Honor Roll eligibility.
    $hasExamAbove95 = false;

    foreach ($examScores as $score) {
        if ($score > 95) {
            $hasExamAbove95 = true;
        }
    }

    echo "\n--- Honor Roll Check ---\n";

    if ($average > 90 && $hasExamAbove95) {
        echo "Congratulations! You qualify for the Honor Roll.\n";
    } else {
        echo "You do not qualify for the Honor Roll.\n";
    }

    // Collect marks for five subjects.
    $failedSubjects = 0;

    echo "\n--- Academic Probation Check ---\n";

    for ($subject = 1; $subject <= 5; $subject++) {
        $subjectScore = getScore("Enter subject $subject score: ");

        if ($subjectScore < 50) {
            $failedSubjects++;
        }
    }

    echo "Number of failed subjects: $failedSubjects\n";

    if ($failedSubjects > 2) {
        echo "Student is placed on academic probation.\n";
    } else {
        echo "Student is not placed on academic probation.\n";
    }

    echo "\n========================================\n";
}

echo "\nGrading process completed for all five students.\n";

?>