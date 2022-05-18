const lang = navigator.language;

let nextWeek = new Date();
nextWeek.setDate(nextWeek.getDate() + 7);

const weekDays = [];

for (let j = 0; j < 7; j++) {
  let first = nextWeek.getDate() - nextWeek.getDay() + j;
  weekDays[j] = new Date(nextWeek.setDate(first));
}

for (let i = 1; i < 7; i++) {
  document.getElementById(`month-name-${i}`).innerHTML = weekDays[
    i
  ].toLocaleString(lang, { month: "long" });
  document.getElementById(`day-name-${i}`).innerHTML = weekDays[
    i
  ].toLocaleString(lang, { weekday: "long" });
  document.getElementById(`day-number-${i}`).innerHTML = weekDays[i].getDate();
  document.getElementById(`year-${i}`).innerHTML = weekDays[i].getFullYear();
  document.getElementById(`month-name-${i}`).style.cssText =
    "margin: 0 ; text-align: center;padding: 25px; background-color: #ff6331; color: white; font-size: 30px;font-family: 'Poppins', sans-serif; font-weight: 700;";
  document.getElementById(`day-name-${i}`).style.cssText =
    "margin: 5px auto; font-size: 20px; font-family: 'Poppins', sans-serif; font-weight: 300; color: #999;";
  document.getElementById(`day-number-${i}`).style.cssText =
    "margin: 5px auto; line-height: 1em; font-size: 80px; font-family: 'Poppins', sans-serif; font-weight: 700; color: #333;";
  document.getElementById(`year-${i}`).style.cssText =
    "margin: 5px auto; font-size: 20px; font-family: 'Poppins', sans-serif; font-weight: 500; color: #999;";
}
