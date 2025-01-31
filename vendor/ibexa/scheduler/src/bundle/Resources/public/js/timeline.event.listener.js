(function (global, doc, ibexa) {
    const refreshPreview = (refreshEvent) => {
        let latestPublishLaterEventInRange;
        let latestPublishLaterEventBeforeRange;
        const { newTimestamp, oldTimestamp, events } = refreshEvent.detail;
        const isSetToFuture = newTimestamp > oldTimestamp;
        const now = new Date().getTime();
        const publishLaterEventsInRange = [];
        const publishLaterEventsBeforeRange = [];
        const findLatestEvent = (latestEvent, event) => {
            return latestEvent.date < event.date ? event : latestEvent;
        };

        events.forEach((event) => {
            const isPublishLaterEvent = event.type === 'future_publication';

            if (!isPublishLaterEvent) {
                return;
            }

            const timestamp = event.date * 1000;
            const isBeforeTimeRange = isSetToFuture
                ? timestamp >= now && timestamp <= oldTimestamp
                : timestamp >= now && timestamp <= newTimestamp;
            const isInTimeRange = isSetToFuture
                ? timestamp > oldTimestamp && timestamp <= newTimestamp
                : timestamp <= oldTimestamp && timestamp > newTimestamp;

            if (isInTimeRange) {
                publishLaterEventsInRange.push(event);
            } else if (isBeforeTimeRange) {
                publishLaterEventsBeforeRange.push(event);
            }
        });

        if (!publishLaterEventsInRange.length) {
            return;
        }

        if (publishLaterEventsInRange.length) {
            latestPublishLaterEventInRange = publishLaterEventsInRange.reduce(findLatestEvent);
        }
        if (publishLaterEventsBeforeRange.length) {
            latestPublishLaterEventBeforeRange = publishLaterEventsBeforeRange.reduce(findLatestEvent);
        }

        const latestPublishLaterEvent = isSetToFuture ? latestPublishLaterEventInRange : latestPublishLaterEventBeforeRange;

        global.location = global.Routing.generate(
            'ezplatform.page_builder.location_preview',
            {
                locationId: ibexa.pageBuilder.data.locationId,
                languageCode: ibexa.pageBuilder.data.languageCode,
                versionNo: latestPublishLaterEvent ? latestPublishLaterEvent.futureVersionNo : ibexa.pageBuilder.data.publishedVersionNo,
                siteaccessName: ibexa.pageBuilder.data.siteaccess,
                reference_timestamp: Math.floor(newTimestamp / 1000),
            },
            true,
        );
    };

    doc.body.addEventListener('ibexa-timestamp-changed', refreshPreview, false);
})(window, document, window.ibexa);
