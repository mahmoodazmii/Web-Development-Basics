document.getElementById("add-task-button").addEventListener("click", addTask);

function addTask() {
  const taskInput = document.getElementById("task-input");
  const taskText = taskInput.value.trim();

  if (taskText === "") {
    alert("Please enter a task");
    return;
  }

  const taskList = document.getElementById("task-list");
  const taskItem = document.createElement("li");
  taskItem.className = "task";
  taskItem.innerHTML = `
        <span>${taskText}</span>
        <button onclick="deleteTask(this)">Delete</button>
    `;

  taskList.appendChild(taskItem);
  taskInput.value = "";
}

function deleteTask(button) {
  const taskItem = button.parentElement;
  taskItem.remove();
}
