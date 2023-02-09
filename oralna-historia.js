const text1_options = window.pensionersInformation_array;

const text1_button = window.timeReservation1_array;
const text2_button = window.timeReservation2_array;
const text3_button = window.timeReservation3_array;
const date_array = window.pensionersDate_array;
const pensionersId = window.pensionersId_array;
const time1 = window.time1_array;
const time2 = window.time2_array;
const time3 = window.time3_array;
const currentOptionText1 = document.getElementById("current-option-text1");
const buttonReservation1 = document.getElementById("time-reservation-1");
const buttonReservation2 = document.getElementById("time-reservation-2");
const buttonReservation3 = document.getElementById("time-reservation-3");
const currentOptionImage = document.getElementById("image");
const namePensioners = document.getElementById("name_pensioners");
const carousel = document.getElementById("carousel-wrapper");
const mainMenu = document.getElementById("menu");
const optionPrevious = document.getElementById("previous-option");
const optionNext = document.getElementById("next-option");
const inputId = document.getElementById("pensioner_id");
const datum = document.getElementById("date_o");
var i = 0;

function control() {
  if (text1_button[i] == null || time1[i] == "RESERVED") {
    buttonReservation1.style.display = "none";
  } else {
    buttonReservation1.style.display = "inline-block";
  }
  if (text2_button[i] == null || time2[i] == "RESERVED") {
    buttonReservation2.style.display = "none";
  } else {
    buttonReservation2.style.display = "inline-block";
  }
  if (text3_button[i] == null || time3[i] == "RESERVED") {
    buttonReservation3.style.display = "none";
  } else {
    buttonReservation3.style.display = "inline-block";
  }
}
cell = document.querySelector("cell");
const image_options = window.pensionersImg_array;
const pensioners_name = window.pensionersName_array;
const pensioners_surname = window.pensionersSurname_array;

// console.log(cell.textContent);
// filter_date = document.getElementById("click_date").getAttribute("data-data");
// console.log(filter_date);
// today_date = date_array
//   .map((str, index) => (str === filter_date ? index : null))
//   .filter((index) => index !== null);

control();
inputId.value = pensionersId[i];
namePensioners.innerText = pensioners_name[i] + " " + pensioners_surname[i];
currentOptionText1.innerText = text1_options[i];
buttonReservation1.innerText = text1_button[i];
buttonReservation2.innerText = text2_button[i];
buttonReservation3.innerText = text3_button[i];
datum.setAttribute("value", date_array[i]);
currentOptionImage.style.backgroundImage =
  "url(obrazky/" + image_options[i] + ")";

optionNext.onclick = function () {
  i = i + 1;
  i = i % text1_options.length;

  control();

  currentOptionText1.dataset.nextText = text1_options[i];

  buttonReservation1.dataset.nextText = text1_button[i];
  buttonReservation2.dataset.nextText = text2_button[i];
  buttonReservation3.dataset.nextText = text3_button[i];
  namePensioners.innerText = pensioners_name[i] + " " + pensioners_surname[i];
  datum.setAttribute("value", date_array[i]);
  carousel.classList.add("anim-next");

  setTimeout(() => {
    currentOptionImage.style.backgroundImage =
      "url(obrazky/" + image_options[i] + ")";
  }, 455);

  setTimeout(() => {
    inputId.value = pensionersId[i];
    currentOptionText1.innerText = text1_options[i];
    buttonReservation1.innerText = text1_button[i];
    buttonReservation2.innerText = text2_button[i];
    buttonReservation3.innerText = text3_button[i];

    namePensioners.innerText = pensioners_name[i] + " " + pensioners_surname[i];
    carousel.classList.remove("anim-next");
  }, 650);
};

optionPrevious.onclick = function () {
  if (i === 0) {
    i = text1_options.length;
  }
  i = i - 1;

  control();
  currentOptionText1.dataset.previousText = text1_options[i];

  buttonReservation1.dataset.previousText = text1_button[i];
  buttonReservation2.dataset.previousText = text2_button[i];
  buttonReservation3.dataset.previousText = text3_button[i];
  namePensioners.innerText = pensioners_name[i] + " " + pensioners_surname[i];
  datum.setAttribute("value", date_array[i]);
  carousel.classList.add("anim-previous");

  setTimeout(() => {
    currentOptionImage.style.backgroundImage =
      "url(obrazky/" + image_options[i] + ")";
  }, 455);

  setTimeout(() => {
    inputId.value = pensionersId[i];
    currentOptionText1.innerText = text1_options[i];
    buttonReservation1.innerText = text1_button[i];
    buttonReservation2.innerText = text2_button[i];
    buttonReservation3.innerText = text3_button[i];

    carousel.classList.remove("anim-previous");
  }, 650);
};
