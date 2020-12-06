/* global algoliasearch instantsearch */

const searchClient = algoliasearch('NJEILDQ6NA', 'b05183c8ab3f96cf8f09317bf3dc5e31');

const search = instantsearch({
  indexName: 'users',
  searchClient,
});

search.addWidgets([
  instantsearch.widgets.searchBox({
    container: '#searchbox',
  }),
  instantsearch.widgets.hits({
    container: '#hits',
    templates: {
      item: `
<article>
  <h1>{{#helpers.highlight}}{ "attribute": "name" }{{/helpers.highlight}}</h1>
</article>
`,
    },
  }),
  instantsearch.widgets.pagination({
    container: '#pagination',
  }),
]);

search.start();
