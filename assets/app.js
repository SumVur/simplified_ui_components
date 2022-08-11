window.onload = () => {
  require.config({
    baseUrl: "/assets"
  });
  //Load knockout js
  require(['ko']);

  let key = 'script[type="simplified/ui-components"]';

  document.querySelectorAll(key).forEach((script) => {
    let uiData = JSON.parse(script.innerHTML);
    processUiNode(uiData);
  });

  function processUiNode(node) {
    for (let subNodeKey in node) {
      let subNode = node[subNodeKey];
      if (!subNode.hasOwnProperty('component')) {
        throw new Error('Component is not defined for the given name ' + name);
      }

      require([subNode['component']]);

      if (subNode.hasOwnProperty('children')) {
        processUiNode(subNode.children);
      }
    }
  }
}