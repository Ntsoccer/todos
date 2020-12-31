const radio0 = document.getElementById('radio0');
const radio1 = document.getElementById('radio1');
const radio2 = document.getElementById('radio2');
const works = document.getElementsByClassName('work');
const dones = document.getElementsByClassName('done');

radio0.addEventListener('change', () => {
  for (let i = 0; i < works.length; i++) {
    const workParent = works[i].closest('tr');
    workParent.style.display = "";
  }
  for (let i = 0; i < dones.length; i++) {
    const doneParent = dones[i].closest('tr');
    doneParent.style.display = "";
  }
})
radio1.addEventListener('change', () => {
  for (let i = 0; i < works.length; i++) {
    const workParent = works[i].closest('tr');
    workParent.style.display = "";
  }
  for (let i = 0; i < dones.length; i++) {
    const doneParent = dones[i].closest('tr');
    doneParent.style.display = "none";
  }
})
radio2.addEventListener('change', () => {
  for (let i = 0; i < works.length; i++) {
    const workParent = works[i].closest('tr');
    workParent.style.display = "none";
  }
  for (let i = 0; i < dones.length; i++) {
    const doneParent = dones[i].closest('tr');
    doneParent.style.display = "";
  }
})

// radio0.addEventListener('change', () => {
//   works.forEach(work => {
//     const workParent = work.closest('tr');
//     workParent.style.display = "";
//   })
//   dones.forEach(done => {
//     const doneParent = done.closest('tr');
//     doneParent.style.display = "";
//   })
// })
// radio1.addEventListener('change', () => {
//   works.forEach(work => {
//     const workParent = work.closest('tr');
//     workParent.style.display = "";
//   })
//   dones.forEach(done => {
//     const doneParent = done.closest('tr');
//     doneParent.style.display = "none";
//   })
// })
// radio2.addEventListener('change', () => {
//   works.forEach(work => {
//     const workParent = work.closest('tr');
//     workParent.style.display = "none"
//   })
//   dones.forEach(done => {
//     const doneParent = done.closest('tr');
//     doneParent.style.display = ""
//   })
// })
