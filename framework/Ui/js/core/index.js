define(['core/processNode'], function (processNode) {
  return {
    start: function () {
      let key = 'script[type="simplified/ui-components"]';

      document.querySelectorAll(key).forEach((script) => {
        let uiData = JSON.parse(script.innerHTML);
        processNode.process(uiData);
      });
    }
  }
})