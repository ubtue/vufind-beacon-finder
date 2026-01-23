var BEACONFinder = {
  getReferencesByAuthorityId: function(authorityId) {
    var url = VuFind.path + '/AJAX/beacon?' + $.param({
      method: 'getBEACONReferences',
      id: authorityId
    });

    $.ajax({
      url: url,
      success: function getBEACONReferencesSuccessCallback(response) {
        $('#beacon_placeholder').html(response);
      },
      error: function getBEACONReferencesError() {
        console.log('BEACON lookup failed');
      }
    });
  }
};
