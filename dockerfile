# Use nginx from DaoCloud mirror
FROM docker.m.daocloud.io/library/nginx:alpine

# Remove default nginx content
RUN rm -rf /usr/share/nginx/html/*

# Copy your portfolio files into nginx html folder
COPY ./ /usr/share/nginx/html/

# Expose port 80
EXPOSE 80

# Start nginx in foreground
CMD ["nginx", "-g", "daemon off;"]
