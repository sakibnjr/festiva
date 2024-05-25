const eventButton = document.getElementById("event-btn");
const eventButton2 = document.getElementById("event-btn2");
const eventSection = document.getElementById("event-section");

eventButton.addEventListener("click", () => {
  eventSection.scrollIntoView({
    behavior: "smooth",
  });
});

eventButton2.addEventListener("click", () => {
  eventSection.scrollIntoView({
    behavior: "smooth",
  });
});

const workshopbtn = document.getElementById("workshop-btn");
const workshopsection = document.getElementById("workshoparea");

workshopbtn.addEventListener("click", () => {
  workshopsection.scrollIntoView({
    behavior: "smooth",
  });
});
