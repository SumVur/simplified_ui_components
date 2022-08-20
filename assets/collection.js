define(['ko', 'underscore', 'assets/form/component/element'], function (ko, _, Element) {
  /**
   * @constructor
   */
  function Collection() {
    this.children = ko.observableArray([]);

    this.template = "";
  }

  _.extend(Collection.prototype, Element.prototype)
  return Collection;
})