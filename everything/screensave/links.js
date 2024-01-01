let user_links = [];
try {
  user_links = JSON.parse(window.localStorage.getItem("user_links"));
} catch (error) {
  user_links = [];
}

links = user_links

function get_favicon_img(link) {
  const img = document.createElement("img");

  let url = "https://icon.horse/icon/" + link;
  img.src = url;
  img.width = 32;
  img.height = 32;

  return img;
}

const link_div = document.querySelector(".links");

links.forEach((x, inx) => {
  const div = document.createElement("div");
  const text = document.createElement("a");
  text.textContent = x;
  text.href = x;
  text.classList.add("big");
  div.appendChild(get_favicon_img(links[inx]));
  div.appendChild(text);

  link_div.appendChild(div);
  console.log(link_div);
});
