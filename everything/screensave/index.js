function sleep(ms) {
  return new Promise((resolve) => setTimeout(resolve, ms));
}

const links = [
  "google.com",
  "youtube.com",
  "pwg-wittlich.de",
  "192.168.1.10"
]

async function get_favicon(link){
  let body = await fetch("https://www.google.com/s2/favicons?domain=" + link).then(x => x.body)

  console.log(body);
}
get_favicon(links[2])
