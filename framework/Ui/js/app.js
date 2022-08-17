requirejs.config({
  baseUrl: 'framework/Ui/js/lib',
  paths: {
    assets: '../../../../assets',
    core: '../core',
  }
});

requirejs(['core/index', 'ko', "core/simplifiedTemplateEngine"],
  function (index, ko, engine) {
    ko.setTemplateEngine(engine);
    index.start();
  });