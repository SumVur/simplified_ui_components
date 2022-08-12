define(['core/construct'], function (Construct) {
  return {
    process: async function (node, parentId) {
      for (let subNodeKey in node) {
        let subNode = node[subNodeKey];
        if (!subNode.hasOwnProperty('component')) {
          throw new Error('Component is not defined for the given name ' + name);
        }
        var constructNode = await Construct.constructNode(subNode);

        var uiComponentNode = document.getElementById(parentId);
        uiComponentNode.appendChild(constructNode);

        if (subNode.hasOwnProperty('children')) {
          this.process(subNode.children, constructNode.getAttribute('id'));
        }
      }
    }
  }
})