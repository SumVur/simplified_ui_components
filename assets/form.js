define(['ko', 'underscore', 'assets/form/component/element'], function (ko, _, Element) {
  /**
   * @constructor
   */
  function Form() {
    this.children = ko.observableArray([]);

    this.template = "";
  }

  _.extend(Form.prototype, Element.prototype)
  return Form;
})