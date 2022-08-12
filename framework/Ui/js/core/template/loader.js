define([], function () {
  return {
    load: async function (path) {
      let template = await fetch(`assets/${path}.html`)
        .then(response => response.text())
      template = template.replace("....", "")
      return template;
    }
  }
})