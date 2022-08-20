define(['underscore', 'core/componentManager'], function (_, componentManager) {
    return {
      /**
       * construct node & load component
       * @param node
       * @returns {`${string}_${string}`}
       */
      constructNode: function (node) {
        if (!node.hasOwnProperty('component')) {
          throw new Error('Component is not defined for the given name ' + node.name);
        }

        if (!node.hasOwnProperty('template')) {
          throw new Error('template is not defined for the given name ' + node.name);
        }

        let children = [];
        if (node.hasOwnProperty('children')) {
          for (let childKey in node['children']) {
            let childNode = node['children'][childKey];
            let childComponent = this.constructNode(childNode);

            children.push(childComponent);
          }
        }

        let component = `assets/${node.component}`;
        let componentId = componentManager.getId(node.name);
        componentManager.load(componentId, component, children, node.template)

        return componentId;
      }
    }
  }
)