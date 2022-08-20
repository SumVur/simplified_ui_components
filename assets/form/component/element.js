define(['ko'], function (ko) {
  /**
   * @constructor
   */
  function Element() {
    this.children = ko.observableArray([]);

    this.template = "";
  }

  Element.prototype = {
    constructor: Element,

    getChildren: function () {
      return this.children;
    },

    addChildren: function (child) {
      this.children.push({child: child})
    },

    getTemplate: function () {
      return {
        name: this.template,
        data: {children: this.children}
      };
    },

    setTemplate: function (name) {
      this.template = name;
    }
  }
  return Element;
})