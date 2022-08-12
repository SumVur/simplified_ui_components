define(['core/processUiNode'], function (processUiNode) {
  return {
    start: function () {
      let key = 'script[type="simplified/ui-components"]';

      document.querySelectorAll(key).forEach((script) => {
        let uiData = JSON.parse(script.innerHTML);
        processUiNode.process(uiData,"all_ui_components");
      });
    }
  }
})