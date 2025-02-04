<?php
session_start();

// Initialize the task list in the session if not already set
if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [];
}

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['task']) && !empty(trim($_POST['task']))) {
        // Add a task
        $_SESSION['tasks'][] = htmlspecialchars(trim($_POST['task']));
    } elseif (isset($_POST['delete'])) {
        // Delete a task by index
        $index = $_POST['delete'];
        if (isset($_SESSION['tasks'][$index])) {
            unset($_SESSION['tasks'][$index]);
            $_SESSION['tasks'] = array_values($_SESSION['tasks']); // Re-index tasks
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            text-align: center;
        }
        .todo-container {
            width: 400px;
            margin: 0 auto;
        }
        .task-list {
            list-style: none;
            padding: 0;
        }
        .task-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #f4f4f4;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
        }
        button {
            border: none;
            background: red;
            color: white;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
        }
        button:hover {
            background: darkred;
        }
        input[type="text"] {
            width: 70%;
            padding: 10px;
            font-size: 16px;
            margin-bottom: 20px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background: green;
            color: white;
            border: none;
            border-radius: 5px;
        }
        input[type="submit"]:hover {
            background: darkgreen;
        }
    </style>
</head>
<body>
    <h1>To-Do List</h1>
    <div class="todo-container">
        <!-- Add Task Form -->
        <form method="post" action="">
            <input type="text" name="task" placeholder="Enter a new task" required>
            <input type="submit" value="Add Task">
        </form>

        <!-- Task List -->
        <ul class="task-list">
            <?php if (!empty($_SESSION['tasks'])): ?>
                <?php foreach ($_SESSION['tasks'] as $index => $task): ?>
                    <li class="task-item">
                        <span><?php echo $task; ?></span>
                        <form method="post" action="" style="display:inline;">
                            <button type="submit" name="delete" value="<?php echo $index; ?>">Delete</button>
                        </form>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No tasks yet. Add one above!</p>
            <?php endif; ?>
        </ul>
    </div>
</body>
</html>
