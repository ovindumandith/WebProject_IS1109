function toggleIconHover(event, iconName) {
  event.preventDefault();
  const icon = document.querySelector(`.${iconName}`);
  icon.classList.toggle("hovered");
}
