/* global algoliasearch instantsearch */

const searchClient = algoliasearch(
  'NJEILDQ6NA',
  'b05183c8ab3f96cf8f09317bf3dc5e31'
);

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
  instantsearch.widgets.stats({
    container: '#stats',
  }),
  instantsearch.widgets.hitsPerPage({
    container: '#hits-per-page',
    items: [
      { label: '8 hits per page', value: 8, default: true },
      { label: '16 hits per page', value: 16 },
    ],
  }),
]);

search.start();
