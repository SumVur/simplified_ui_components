requirejs.config({
  baseUrl: 'framework/Ui/js/lib',
  paths: {
    assets: '../../../../assets',
    core: '../core',
  }
});

requirejs(['core/index'],
  function (index) {
    index.start();
  });