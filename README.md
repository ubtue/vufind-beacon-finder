[![CI Status](https://github.com/ubtue/vufind-beacon-finder/actions/workflows/ci.yaml/badge.svg?branch=main)](https://github.com/ubtue/vufind-beacon-finder/actions/workflows/ci.yaml)
# VuFindBEACONFinder module for VuFind

This module provides a simple integration for [BEACONfinder](https://github.com/fid-philosophie/BEACONfinder_PRIVATE) into [VuFind](https://vufind.org). BEACONfinder is still under development, and so is this module / use at your own risk!

The basic idea behind this integration is to dynamically include the BEACONfinder whenever an authority page is loaded in the frontend, using CachingDownloader for better performance.
Since a (potential) external service will be queried, there is also an AJAX endpoint which can be used to avoid delays when loading the page in case the service is under pressure.
Another option might be to extend the Solr schema, add the information when importing into Solr, and then get the information from there when rendering the Record, but this is not part of this module.

## Enabling the module

1. Include mixin & templates

    Create a symlink `themes/beacon_finder_mixin` to `vendor/ubtue/vufind-beacon-finder/res/theme`

    Register the mixin in your `theme.config.php`

    ```
    return [
        'mixins' => [
            'beacon_finder_mixin',
        ],
    ];
    ```

    Include one of the following templates at the top of your `authority/record.phtml`:

    ```
    <?=
    // static
    //$this->render('authority/record/BEACONfinder.phtml');

    // ajax
    //$this->render('authority/record/BEACONfinder-ajax.phtml');
    ?>
    ```

2. Modify RecordDriver

    You also need to implement the provided interface in your record driver to provide the authority id:
    ```
    class SolrAuthMarc implements VuFindBEACONFinder\RecordDriver\Feature\BEACONFinderInterface
    {
        public function getAuthorityId()
        {
            // return the ID depending on your custom field
        }
    }
    ```

3. adjust configuration

    Per default, your BEACONfinder service is running locally on port 8000.
    If you want to change this, copy the file `res/config/BEACONfinder.ini` to your `local/config/vufind` directory
    and change the corresponding `baseUrl` setting.

    Regarding Cache settings, the BEACONfinder uses its own sub-section.
    You can influence the cache settings either by changing the global settings in the `config.ini` `[Cache]` section,
    or by adding a new `[Cache_BEACONfinder]` section and entering custom settings there.
