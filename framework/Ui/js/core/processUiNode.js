define([], function () {
  return {
    process: function (node) {
      for (let subNodeKey in node) {
        let subNode = node[subNodeKey];
        if (!subNode.hasOwnProperty('component')) {
          throw new Error('Component is not defined for the given name ' + name);
        }

        require([`assets/${subNode['component']}`]);

        if (subNode.hasOwnProperty('children')) {
          this.process(subNode.children);
        }
      }
    }
  }
})