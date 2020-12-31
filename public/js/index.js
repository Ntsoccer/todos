const radio0 = document.getElementById('radio0');
const radio1 = document.getElementById('radio1');
const radio2 = document.getElementById('radio2');
const todo0s = document.querySelectorAll('.todo0');
const todo1s = document.querySelectorAll('.todo1');
// const todo0 = todo0s.parentNode;
// console.log(todo0);
radio0.addEventListener('change', () => {
  todo0s.forEach(todo0 => {
    const todo0Parent = todo0.closest('tr');
    todo0Parent.style.display = "";
  })
  todo1s.forEach(todo1 => {
    const todo1Parent = todo1.closest('tr');
    todo1Parent.style.display = "";
  })
})
radio1.addEventListener('change', () => {
  todo0s.forEach(todo0 => {
    const todo0Parent = todo0.closest('tr');
    todo0Parent.style.display = "";
  })
  todo1s.forEach(todo1 => {
    const todo1Parent = todo1.closest('tr');
    todo1Parent.style.display = "none";
  })
})
radio2.addEventListener('change', () => {
  todo0s.forEach(todo0 => {
    const todo0Parent = todo0.closest('tr');
    todo0Parent.style.display = "none"
  })
  todo1s.forEach(todo1 => {
    const todo1Parent = todo1.closest('tr');
    todo1Parent.style.display = ""
  })
})
