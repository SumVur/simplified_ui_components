define(['underscore', 'ko'], function(_, ko) {
    let SimplifiedTemplateEngine = ko.nativeTemplateEngine,
        sourceRegistry = {};

    SimplifiedTemplateEngine.prototype.makeTemplateSource = function (template) {
        if (sourceRegistry.hasOwnProperty(template)) {
            return sourceRegistry[template];
        }

        let source = {
            text: ko.observable(''),
            templateName: template,
            data: {}
        };

        if (_.isObject(template) && (template.nodeType === 1 || template.nodeType === 8)) {
            source = new ko.templateSources.anonymousTemplate(template);

            return source;
        }

        fetch('assets/' + template + '.html')
            .then(response => response.text())
            .then(response => {
                sourceRegistry[template] = source;
                source.text(response)
            })

        return source;
    }

    return new SimplifiedTemplateEngine;
})
