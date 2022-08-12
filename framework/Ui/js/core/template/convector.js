define(['core/generateId'], function (GenerateId) {
  return {
    convect: function (template) {
      let parser = new DOMParser();
      const doc = parser.parseFromString(template, 'text/html');

      let body = doc.documentElement.getElementsByTagName("body")[0]
      let element = body.firstChild
      element.setAttribute("id", GenerateId.generate())
      return element
    }
  }
})