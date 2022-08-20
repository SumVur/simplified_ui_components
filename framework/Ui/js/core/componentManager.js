define(['core/registry'], function (registry) {
  return {

    /**
     * get component form registry
     * @param node
     * @returns {Promise<unknown>}
     */
    get: function (node) {
      function getSome(node, resolve) {
        let childComponent = registry.get(node)
        if (childComponent !== undefined) {
          resolve(childComponent);
        }
        setTimeout(() => getSome(node, resolve), 10)
      }

      return new Promise(function (resolve) {
        getSome(node, resolve)
      })
    },

    /**
     * generate random id
     * @param name
     * @returns {`${string}_${string}`}
     */
    getId: function (name) {
      let id = Math.random().toString(36).substring(2, 4 + 2);
      return `${name}_${id}`
    },

    /**
     * require component, add template, children, add save to registry
     * @param componentId
     * @param component
     * @param children
     * @param template
     */
    load: function (componentId, component, children, template) {
      require([component, 'core/registry', 'core/componentManager'], function (component, registry, componentManager) {
          let instanceComponent = new component();
          instanceComponent.setTemplate(template);

          if (children.length > 0) {
            for (const child of children) {
              componentManager.get(child).then((childComponent) => {
                instanceComponent.addChildren(childComponent)
              })
            }
          }
          registry.set(componentId, instanceComponent)
        }
      );
    }
  }
})