define(['core/template/loader', 'core/template/convector'], function (TemplateLoader, TemplateConvector) {
  return {
    constructNode: async function (node) {
      require([`assets/${node['component']}`]);

      let template = await TemplateLoader.load(node['template']);

      return TemplateConvector.convect(template);
    }
  }
})