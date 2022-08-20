define([], function () {
  let privateData = new WeakMap();

  function getItems(container) {
    return privateData.get(container).items;
  }

  /**
   * @constructor
   */
  function Registry() {
    let data = {
      items: {},
    };
    privateData.set(this, data);
  }

  Registry.prototype = {
    constructor: Registry,

    /**
     * Get provided item from the registry.
     * @param id
     * @returns {*}
     */
    get: function (id) {
      return getItems(this)[id];
    },

    /**
     * Sets provided item to the registry.
     *
     * @param {String} id - Item's identifier.
     * @param {*} item - Item's data.
     */
    set: function (id, item) {
      getItems(this)[id] = item;
      return this;
    },
  }

  return new Registry;
})