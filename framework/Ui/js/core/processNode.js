define(['ko', 'core/construct', 'core/componentManager'], function (ko, Construct, componentManager) {

  return {
    /**
     * processing all roots nodes
     * @param node
     */
    process: function (node) {
      for (let subNodeKey in node) {
        let subNode = node[subNodeKey];
        subNode = Construct.constructNode(subNode)

        componentManager.get(subNode).then((subNode) => {
          ko.applyBindingsToDescendants(subNode, document.querySelector('#root_ui_component'));
        })
      }
    }
  }
})